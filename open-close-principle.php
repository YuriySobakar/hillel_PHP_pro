<?php 

interface LogFormat {
  public function format(string $value): string;
}

class RawFormat implements LogFormat {
  public function format(string $value): string {
    return $value;
  }
}

class WithDateFormat implements LogFormat {
  public function format(string $value): string {
    return date('Y-m-d H:i:s') . ' ' . $value;
  }
}

class WithDateAndDetailsFormat implements LogFormat {
  public function format(string $value): string {
    return date('Y-m-d H:i:s') . ' ' . $value . ' Some details';
  }
} 

interface DeliveryMethod {
  public function deliver(string $message): void;
}

class email_delivery implements DeliveryMethod{
  public function deliver(string $message): void {
    echo "Send ({$message}) by email";
  }
}

class sms_delivery implements DeliveryMethod {
  public function deliver(string $message): void {
    echo "Send ({$message}) by sms";
  }
}

class console_delivery implements DeliveryMethod {
  public function deliver(string $message): void {
    echo "Show ({$message}) in console";
  }
}

class Logger {
  private LogFormat $formatter;
  private DeliveryMethod $deliverer;

  public function __construct(LogFormat $formatter, DeliveryMethod $deliverer) {
    $this->formatter = $formatter;
    $this->deliverer = $deliverer;
  }

  public function log(string $message): void {
    $formattedMessage = $this->formatter->format($message);
    $this->deliverer->deliver($formattedMessage);
  }
}

$logger = new Logger(new WithDateAndDetailsFormat(), new email_delivery());
$logger->log(' THIS MESSAGE ');